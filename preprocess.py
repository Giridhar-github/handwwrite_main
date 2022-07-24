from os import listdir
import matplotlib.pyplot as plt
import numpy as np
import cv2
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense, Dropout, Activation, Flatten
from tensorflow.keras.layers import Conv2D, MaxPooling2D,BatchNormalization,ZeroPadding2D
from tensorflow.keras import optimizers
from tensorflow.keras.optimizers import SGD
from sklearn.model_selection import train_test_split
from tensorflow.keras.utils import to_categorical
def loadImages(path):
    # return array of images
    imagesList = listdir(path)
    loadedImages = []
    for image in imagesList:
#        print(path+image)
        img = cv2.imread(path + image)
        img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
        img = cv2.cvtColor(img, cv2.COLOR_RGB2GRAY)
        img = cv2.resize(img, (32, 32))
        img = img.flatten()
        loadedImages.append(img)

    return loadedImages
	
 
def model():
	# create model
	model = Sequential()
	model.add(Conv2D(64, (5, 5), input_shape=(32, 32,1), activation='relu'))
	model.add(MaxPooling2D(pool_size=(2, 2)))
	#model.add(Conv2D(64, (5, 5),activation='relu'))
	#model.add(MaxPooling2D(pool_size=(2, 2)))
	#model.add(Dropout(0.))
	model.add(Flatten())
	#model.add(Dense(512,activation='relu'))
	#model.add(Dense(256,activation='relu'))
	model.add(Dense(128, activation='relu'))
	model.add(Dense(8, activation='softmax'))
	# Compile model
	model.compile(loss='categorical_crossentropy', optimizer=optimizers.Adam(lr=0.001, beta_1=0.9, beta_2=0.999, epsilon=1e-08, decay=0.0),metrics=['accuracy'])
	return model
	
"""
	
def model():
   
    print('Building Model..')
    model = Sequential()
    
    model.add(Conv2D(32,(3,3),input_shape=(32,32,1),activation='relu'))
    model.add(ZeroPadding2D((1,1)))
    BatchNormalization(axis=1)
    model.add(Conv2D(64,(3,3),activation='relu'))
    BatchNormalization(axis=1)
    model.add(MaxPooling2D((2,2),strides=(2,2)))
    model.add(ZeroPadding2D((1,1)))
    
    model.add(Conv2D(64,(3,3),activation='relu'))
    model.add(ZeroPadding2D((1,1)))
    BatchNormalization(axis=1)
    model.add(Conv2D(64,(3,3),activation='relu')) 
    BatchNormalization(axis=1)

    model.add(MaxPooling2D((2,2),strides=(2,2)))
    
    model.add(Flatten())
    
    model.add(Dense(2018, activation='relu'))
    model.add(Dropout(0.5))
    
    model.add(Dense(512, activation='relu'))
    model.add(Dropout(0.5))
    
    model.add(Dense(num_classes, activation='softmax'))
    
    sgd = SGD(lr = 0.001, decay = 1e-6, momentum = .9, nesterov=True)
    model.compile(optimizer = sgd, loss='categorical_crossentropy',metrics=['accuracy'])
    
    print('Model Generated')
    
    return model"""




path = "data/aa/"
aa_imgs = loadImages(path)
aa_label = np.ones(len(aa_imgs))*0


path = "data/la/"
il_imgs = loadImages(path)
il_label =  np.ones(len(il_imgs))*1

imgs = aa_imgs.copy()
imgs.extend(il_imgs)

path = "data/na/"
in_imgs = loadImages(path)
in_label =  np.ones(len(in_imgs))*2

imgs.extend(in_imgs)

path = "data/pa/"
ka_imgs = loadImages(path)
ka_label = np.ones(len(ka_imgs))*3

imgs.extend(ka_imgs)

path = "data/ra/"
la_imgs = loadImages(path)
la_label = np.ones(len(la_imgs))*4

imgs.extend(la_imgs)

path = "data/rr/"
na_imgs = loadImages(path)
na_label = np.ones(len(na_imgs))*5

imgs.extend(na_imgs)

path = "data/sa/"
pa_imgs = loadImages(path)
pa_label = np.ones(len(pa_imgs))*6
imgs.extend(pa_imgs)

path = "data/tha/"
ra_imgs = loadImages(path)
ra_label = np.ones(len(ra_imgs))*7
imgs.extend(ra_imgs)

"""path = "data/ssa/"
ssa_imgs = loadImages(path)
ssa_label = np.ones(len(ssa_imgs))*8

imgs.extend(ssa_imgs)

path = "data/tha/"
tha_imgs = loadImages(path)
tha_label = np.ones(len(tha_imgs))*9
imgs.extend(tha_imgs)"""

data = np.array(imgs)
data = data.reshape([-1,32,32])
labels = np.hstack((aa_label,il_label,in_label,ka_label,
                    la_label,na_label,pa_label,
					ra_label))#,ssa_label,tha_label))
labels =np.uint8(labels)
print(labels)

# train
X_train, X_test, y_train, y_test = train_test_split(data, labels,
                                                    test_size=0.1,random_state=42)
#plt.imshow(data[0], cmap=plt.get_cmap('gray'))
#print(y_test)


# flatten 28*28 images to a 784 vector for each image
X_train = X_train.reshape(X_train.shape[0], 32, 32,1).astype('float32')
X_test = X_test.reshape(X_test.shape[0], 32, 32,1).astype('float32')
	
# normalize inputs from 0-255 to 0-1
X_train = X_train / 255
X_test = X_test / 255

y_train = to_categorical(y_train)
y_test = to_categorical(y_test)
num_classes = y_train.shape[1]

print("num of classes",num_classes)

print("Training data size",len(X_train))
print("Testing data size",len(X_test))

model = model()
# Fit the model
fit_history=model.fit(X_train, y_train, validation_data=(X_train, y_train), epochs=100, batch_size=64, verbose=1)
print(fit_history)
model.save('model.h5') 
# Final evaluation of the model
scores = model.evaluate(X_train, y_train, verbose=1)
#print("CNN Error: %.2f%%" % (100-scores*100))
#print("CNN Accuracy: %.2f%%" % (scores*100))
classes=model.predict_classes(X_test)


