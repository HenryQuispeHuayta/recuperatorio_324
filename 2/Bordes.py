from PIL import Image
import PIL
from numpy import imag

imagen = Image.open(r'IMAGEN3.png')
imagenBordes = Image.open(r'IMAGEN3.png')

luz = 2

width = imagen.size[0] - 1
height = imagen.size[1] - 1

for i in range(0,width):
    for j in range(0,height):
        img = imagenBordes.getpixel((i, j))
        x = i
        y = j
        abajo = imagen.getpixel((i, j + 1))
        derecha = imagen.getpixel((i + 1, j))
        
        imgLuz = (img[0] + img[1] + img[2]) / 3
        abajoLuz = (abajo[0] + abajo[1] + abajo[2]) / 3
        derechaLuz = (derecha[0] + derecha[1] + derecha[2]) / 3
        restax = abs(imgLuz - derechaLuz)
        restay = abs(imgLuz - abajoLuz)
        
        color = int(imgLuz - 1)
        if((restax + restay) < 10):
            imagen.putpixel((x, y), (0, 0, 0))
        if((restax + restay) >= 10):
            imagen.putpixel((x, y), (color, color, color))

imagen = imagen.save('nuevo.jpg')