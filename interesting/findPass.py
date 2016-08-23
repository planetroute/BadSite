#!/usr/bin/env python3

import argparse, hashlib, math

parser = argparse.ArgumentParser()
parser.add_argument("username", help="Username to target")
args = parser.parse_args()

def hash(s):
 m = hashlib.md5()
 m.update(bytes(s.lower(), 'utf-8'))
 h = m.hexdigest()[0:4]
 return h

def stringify(n):
 s = ''
 while(n >= len(alphabet)):
  a = n % len(alphabet)
  n = math.floor(n / len(alphabet)) -1
  s = str(alphabet[a]) + s
 s = str(alphabet[n]) + s
 return s

alphabet = [chr(97+i) for i in range(26)] + [i for i in range(10)]

i = -1
h = ''
n = 2
while (n != 0):
 i += 1
 try:
  h = hash(args.username + stringify(i))
  n = int(float(h))
 except:
  pass

print(stringify(i))
print(h)
