import paramiko
import io

host = 'mehedihasan.au'
port = 2222
username = 'mehedih3_cpro306_g10'
password = 'cpro306'

transport = paramiko.Transport((host, port))
transport.connect(username=username, password=password)
sftp = paramiko.SFTPClient.from_transport(transport)

# List root to find structure
def ls(path):
    try:
        items = sftp.listdir_attr(path)
        for i in items:
            print(f"  {'D' if hasattr(i,'st_mode') and i.st_size == 0 else 'F'} {path}/{i.filename} (size={i.st_size})")
    except Exception as e:
        print(f"  Error listing {path}: {e}")

print("=== Root ===")
ls('.')
print("\n=== public_html (if exists) ===")
ls('public_html')
print("\n=== www (if exists) ===")
ls('www')

sftp.close()
transport.close()
