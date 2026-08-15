import os
import paramiko

host = 'mehedihasan.au'
port = 2222
username = 'mehedih3_cpro306_g10'
password = 'cpro306'

local_path = 'c:\\Foodmate\\frontend'
remote_path = '.'  # Upload directly to the root of the server!

def sftp_upload_dir(sftp, local_dir, remote_dir):
    try:
        sftp.stat(remote_dir)
    except IOError:
        try:
            sftp.mkdir(remote_dir)
        except Exception as e:
            print(f"Could not create dir {remote_dir}: {e}")
    
    for item in os.listdir(local_dir):
        local_item = os.path.join(local_dir, item)
        remote_item = f"{remote_dir}/{item}" if remote_dir != "." else item
        
        if os.path.isfile(local_item):
            print(f"Uploading {local_item} to {remote_item}")
            sftp.put(local_item, remote_item)
        elif os.path.isdir(local_item):
            sftp_upload_dir(sftp, local_item, remote_item)

try:
    print("Connecting to server...")
    transport = paramiko.Transport((host, port))
    transport.connect(username=username, password=password)
    sftp = paramiko.SFTPClient.from_transport(transport)
    
    print(f"Uploading {local_path} to {remote_path}...")
    sftp_upload_dir(sftp, local_path, remote_path)
    
    sftp.close()
    transport.close()
    print("Upload complete!")
except Exception as e:
    print(f"Error: {e}")
