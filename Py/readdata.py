import RPi.GPIO as GPIO
import time
import mysql.connector
import sys
import urllib2 

field_url = 'https://api.thingspeak.com/update?api_key=RO05WH3IE95SXZ6Z&'
t = 0
h1 = 0
v1 = 0
h2 = 0
v2 = 0

GPIO.setmode(GPIO.BCM)
 
GPIO_TRIGGER1 = 18 #Pin 12
GPIO_ECHO1 = 23 #Pin 16
GPIO_TRIGGER2 = 19 #Pin 35
GPIO_ECHO2 = 24 #Pin 18
 
GPIO.setup(GPIO_TRIGGER1, GPIO.OUT)
GPIO.setup(GPIO_ECHO1, GPIO.IN)
GPIO.setup(GPIO_TRIGGER2, GPIO.OUT)
GPIO.setup(GPIO_ECHO2, GPIO.IN)
 
def distance_1():
    GPIO.output(GPIO_TRIGGER1, True)
    time.sleep(0.00001)
    GPIO.output(GPIO_TRIGGER1, False)
 
    StartTime = time.time()
    StopTime = time.time()

    while GPIO.input(GPIO_ECHO1) == 0:
        StartTime = time.time()
 
    while GPIO.input(GPIO_ECHO1) == 1:
        StopTime = time.time()
 
    TimeElapsed = StopTime - StartTime
    distance1 = (TimeElapsed * 34300) / 2
    distance1 = round(distance1, 2)
    return distance1

def distance_2():
    GPIO.output(GPIO_TRIGGER2, True) 
    time.sleep(0.00001)
    GPIO.output(GPIO_TRIGGER2, False)
 
    StartTime = time.time()
    StopTime = time.time()

    while GPIO.input(GPIO_ECHO2) == 0:
        StartTime = time.time()
 
    while GPIO.input(GPIO_ECHO2) == 1:
        StopTime = time.time()
 
    TimeElapsed = StopTime - StartTime
    distance2 = (TimeElapsed * 34300) / 2
    distance2 = round(distance2, 2)
 
    return distance2
 
if __name__ == '__main__':
    try:
        while True:
            dist1 = (20-distance_1())
	    dist1 = round(dist1, 2)
	    volume1 = dist1*79.78
	    volume1 = round(volume1, 2)
            print ("Tinggi Pertama = %.1f cm" % dist1)
	    print ("Volume Pertama = %.1f ml" % volume1)
	    h1 = h1+dist1
	    v1 = v1+volume1

            dist2 = (20-distance_2())
	    dist2 = round(dist2, 2)
            volume2 = dist2*79.78
	    volume2 = round(volume2, 2)
	    print ("Tinggi Kedua = %.1f cm" % dist2)
	    print ("Volume Kedua = %.1f ml" % volume2)
	    h2 = h2+dist2
	    v2 = v2+volume2

	    t = t+1
	    time.sleep(0.5)
	    if t == 40:
		h1 = h1/40
		v1 = v1/40
		h2 = h2/40
		v2 = v2/40
		print ("Updating data...")
		print ("Tinggi Pertama = %.1f cm" % h1)
		print ("Volume Pertama = %.1f ml" % v1)
		print ("Tinggi Kedua = %.1f cm" % h2)
		print ("Volume Kedua = %.1f ml" % v2)
	    	update_url = field_url + "field1=" + str(h1) + "&field2=" + str(v1) + "&field3=" + str(h2) + "&field4=" + str(v2)
	    	f = urllib2.urlopen(update_url)
	    	f.read()
	    	f.close()
	    	print update_url
	    	print ("Data was updated!")
		print (" ")
            	t = 0
		h1 = 0
		v1 = 0
		h2 = 0
		v2 = 0
		time.sleep(2)
 
    except KeyboardInterrupt:
        print("Measurement stopped by User")
        GPIO.cleanup()

