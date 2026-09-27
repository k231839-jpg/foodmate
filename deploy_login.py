import paramiko
import os

host = 'mehedihasan.au'
port = 2222
username = 'mehedih3_cpro306_g10'
password = 'cpro306'

local_path = r'c:\Users\Acer\Desktop\Foodmate\frontend\login.php'
remote_paths = [
    'public_html/kent/cpro306/g10/login.php',
    'public_html/login.php'
]

print("Connecting to server...")
transport = paramiko.Transport((host, port))
transport.connect(username=username, password=password)
sftp = paramiko.SFTPClient.from_transport(transport)

for remote_path in remote_paths:
    try:
        print(f"Uploading {local_path} to {remote_path}...")
        sftp.put(local_path, remote_path)
    except Exception as e:
        print(f"Could not upload to {remote_path}: {e}")

sftp.close()
transport.close()
print("Upload complete!")
