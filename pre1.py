import os
import numpy as np
import cv2
path=os.listdir("data")
path
os.mkdir("dataset_new")
kernel = cv2.getStructuringElement(cv2.MORPH_CROSS,(10,10))

for i in path:
    os.mkdir("dataset_new/{}".format(i))
    print("\n"+i+"\n")
    c=0
    for j in os.listdir("data/{}".format(i)):
        print(j)
        image=cv2.imread("data/{}/{}".format(i,j))
        thin = np.zeros(image.shape,dtype='uint8')
        erode = cv2.erode(image,kernel)
        opening = cv2.morphologyEx(erode,cv2.MORPH_OPEN,kernel)
        subset = erode - opening
        thin = cv2.bitwise_or(subset,thin)
        #image = invert(image)
        #image=np.array(image)
        cv2.imwrite("dataset_new/{}/{}".format(i,j),thin)