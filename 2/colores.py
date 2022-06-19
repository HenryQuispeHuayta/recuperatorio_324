from PIL import Image
from matplotlib import pyplot as plt
from collections import Counter
from scipy import ndimage as ndi
from skimage import feature
import scipy.misc
import numpy as np
import statistics
import random
import scipy
import time
#import cv2


"""ABRIR UNA IMAGEN A COLOR Y A GRISES"""
def abrir_imagen(im):
    tiempoIn = time.time()
    ruta = ('IMAGEN5.png')
    im = Image.open(ruta)
    im.show()
    tiempoFin = time.time()
    print('El Proceso Tardo: ', tiempoFin - tiempoIn, ' Segundos')
    
    
"""ESCALA DE GRISES DE LA IMAGEN A COLOR"""
def escala_de_grises(im):
    tiempoIn = time.time()
    ruta = ('IMAGEN5.png')
    im = Image.open(ruta)
    im.show()
    im2 = im
    i = 0
    while i < im2.size[0]:
        j = 0
        while j < im2.size[1]:
            r, g, b = im2.getpixel((i, j))
            g = (r + g + b) / 3
            gris = int(g)
            pixel = tuple([gris, gris, gris])
            im2.putpixel((i, j), pixel)
            j+=1
        i+=1
    im2.show()
    tiempoFin = time.time()
    print('El Proceso Tardo: ', tiempoFin - tiempoIn, ' Segundos')

# """DETECCION DE BORDES CON SOBEL EN UNA IMAGEN A GRISES"""
# def bordes_sobel(im, mask):
#     tiempoIn = time.time()
#     ruta = (im)
#     im = Image.open(ruta)
#     im.show()
#     ima = im
#     [ren, col] = ima.size
#     pix = ima.load()
#     out_im = Image.new("L", (ren, col))
# #   gx + gy + prewit45° = ([1,3,3],[-3,-2,3],[-3,-3,1])
# #   gx = ([-1,0,1], [-2,0,2], [-1,0,1])
# #   gy = ([1,2,1], [0,0,0], [-1,-2,-1])   
#     out = out_im.load()
#     for i in range(ren):
#         for j in range(col):
#             suma = 0
#             for n in range(i-1, i+2):
#                 for m in range(j-1, j+2):
#                     if n >= 0 and m >= 0 and n < ren and m < col:
#                         suma += mask[n - (i - 1)][ m - (j - 1)] * pix[n, m]
#             out[i, j] = suma
#     out_im.show()
#     tiempoFin = time.time()
#     print('El Proceso Tardo: ', tiempoFin - tiempoIn, ' Segundos')
    
    
# """DETECCION DE BORDES CON CANNY EN UNA IMAGEN A GRISES"""
# def bordes_canny(im):
#     tiempoIn = time.time()
#     ruta = (im)
#     im = Image.open(ruta)
#     im.show()
#     ima = im
#     ima = ndi.gaussian_filter(im, 4)
#     edges = feature.canny(ima)
#     fig, (ax2) = plt.subplots(nrows = 1, ncols = 1, figsize = (8, 3), sharex = True, sharey = True)
#     ax2.imshow(edges, cmap = plt.cm.gray)
#     ax2.axis('off')
#     plt.show()
#     tiempoFin = time.time()
#     print('El Proceso Tardo: ', tiempoFin - tiempoIn, ' Segundos')

def tramspuesta(im):
    tiempoIn = time.time()
    ruta = (im)
    im = Image.open(ruta)
    im.show()
    im7 = im
    ar = np.zeros((im7.size[0], im7.size[1]))
    i = 0 
    while i < im7.size[1]:
        j = 0
        while j < im7.size[0]:
            a = im7.getpixel((j, i))
            ar[j, i] = a
            j+=1
        i+=1
    ar = ar.astype(int)    
    im7 = Image.fromarray(ar)
    im7.show()
    tiempoFin = time.time()
    print('El Proceso Tardo: ', tiempoFin - tiempoIn, ' Segundos')    
    
