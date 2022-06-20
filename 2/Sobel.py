from tkinter import Image
import cv2
import numpy as np

imagenIn = cv2.imread('1.jpg', 0)

def convT(imagen):
    imagenCopia = imagen.copy()

    for i in range(imagen.shape[0]):
        for j in range(imagen.shape[1]):
            imagenCopia[i][j] = imagen[imagen.shape[0] - i - 1][imagen.shape[1] - j - 1]
    return imagenCopia

def conv(imagen, kernel):
    kernel = convT(kernel)
    imageH = imagen.shape[0]
    imageW = imagen.shape[1]

    kernelH = kernel.shape[0]
    kernelW = kernel.shape[1]
    
    h = kernelH//2
    w = kernelW//2

    imagenConv = np.zeros(imagen.shape)

    for i in range(h, imageH - h):
        for j in range(w, imageW - w):
            sum = 0
            for k in range(kernelH):
                for l in range(kernelW):
                    sum = (sum + kernel[k][l] * imagen[i-h+k][j-w+l])
            imagenConv[i][j] = sum
    return imagenConv

def norm(img1, img2):
    imagenCopia = np.zeros(img1.shape)

    for i in range(img1.shape[0]):
        for j in range(img1.shape[1]):
            q = (img1[i][j]**2 + img2[i][j]**2)**(1/2)
            if(q>90):
                imagenCopia[i][j] = 255
            else:
                imagenCopia[i][j] = 0
    return imagenCopia

kernel = np.zeros(shape=(3,3))
kernel[0, 0] = -1
kernel[0, 1] = -2
kernel[0, 2] = -1
kernel[1, 0] = 0
kernel[1, 1] = 0
kernel[1, 2] = 0
kernel[2, 0] = 1
kernel[2, 1] = 2
kernel[2, 2] = 1

gy = conv(imagenIn, kernel)
# cv2.imshow('gradiente y', gy)

kernel[0, 0] = -1
kernel[0, 1] = 0
kernel[0, 2] = 1
kernel[1, 0] = -1
kernel[1, 1] = 0
kernel[1, 2] = 1
kernel[2, 0] = -2
kernel[2, 1] = 0
kernel[2, 2] = 2

gx = conv(imagenIn, kernel)
# cv2.imshow('gradiente x', gx)
gSobel = norm(gx, gy)

cv2.imshow('Sobel', gSobel)

cv2.waitKey(0)
cv2.destroyAllWindows()