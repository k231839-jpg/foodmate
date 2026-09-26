import os
import paramiko

host = 'mehedihasan.au'
port = 2222
username = 'mehedih3_cpro306_g10'
password = 'cpro306'

base_local_path = r'c:\Users\Acer\Desktop\Foodmate'
remote_base_path = 'public_html'

dirs_to_upload = [
    ('frontend', ''), # upload contents of frontend directly
    ('api', 'api')    # upload api to api subdirectory
]
def mkdir_p(sftp, remote_path):
    """Recursively create remote directories."""
    dirs = []
    path = remote_path
    while True:
        try:
            sftp.stat(path)
            break
        except IOError:
            dirs.append(path)
            path = '/'.join(path.split('/')[:-1])
            if not path:
                break
    for d in reversed(dirs):
        try:
            sftp.mkdir(d)
            print(f"Created remote dir: {d}")
        except Exception:
            pass

def sftp_upload_dir(sftp, local_dir, remote_dir):
    mkdir_p(sftp, remote_dir)
    
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
    
    for local_dir, remote_subdir in dirs_to_upload:
        full_local = os.path.join(base_local_path, local_dir)
        full_remote = f"{remote_base_path}/{remote_subdir}" if remote_subdir else remote_base_path
        
        print(f"Uploading {full_local} to {full_remote}...")
        sftp_upload_dir(sftp, full_local, full_remote)
    
    sftp.close()
    transport.close()
    print("Upload complete!")
except Exception as e:
    print(f"Error: {e}")
