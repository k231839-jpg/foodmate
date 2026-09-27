import paramiko, os
host = 'mehedihasan.au'; port = 2222; username = 'mehedih3_cpro306_g10'; password = 'cpro306'
t = paramiko.Transport((host, port)); t.connect(username=username, password=password)
s = paramiko.SFTPClient.from_transport(t)
try:
    print(s.stat('.'))
    print("Files in root:", s.listdir('.'))
finally:
    s.close(); t.close()
