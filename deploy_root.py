import paramiko, os
host = 'mehedihasan.au'; port = 2222; username = 'mehedih3_cpro306_g10'; password = 'cpro306'
t = paramiko.Transport((host, port)); t.connect(username=username, password=password)
sftp = paramiko.SFTPClient.from_transport(t)
base_local_path = r'c:\Users\Acer\Desktop\Foodmate'

def upload_dir(local_dir, remote_dir):
    try: sftp.stat(remote_dir)
    except: sftp.mkdir(remote_dir)
    for item in os.listdir(local_dir):
        local_item = os.path.join(local_dir, item)
        remote_item = f"{remote_dir}/{item}" if remote_dir != "." else item
        if os.path.isfile(local_item):
            print(f"Uploading {local_item} -> {remote_item}")
            sftp.put(local_item, remote_item)
        elif os.path.isdir(local_item):
            upload_dir(local_item, remote_item)

print("Deploying frontend to root...")
upload_dir(os.path.join(base_local_path, 'frontend'), '.')
print("Done!")
sftp.close(); t.close()
