from tensorflow.keras.models import load_model
#import easygui
import cv2
import numpy as np
import os



# load model
model = load_model('model.h5')

# load image
print("waiting for file")
#path=easygui.fileopenbox()
path="input/test.jpg"


img = cv2.imread(path)
img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
img = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
img = cv2.resize(img, (32, 32))

data = np.array(img)
data = data.reshape([-1,32,32,1])
data = data / 255

#label=['aa','il','in','ka','la','na','pa','ra','ssa','tha']
label=['aa','la','na','pa','ra','rr','sa','tha','chha','dha','ga','ha','il','ja','ka','kha','ma','nga','rr','rra','rru','sha','ta','uu','va']
classs=model.predict_classes(data)

print("\noutput:\n",label[classs[0]])


file=open("out.txt","w")
file.write(label[classs[0]])
file.close()













