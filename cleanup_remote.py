import paramiko

host = 'mehedihasan.au'
port = 2222
username = 'mehedih3_cpro306_g10'
password = 'cpro306'

try:
    transport = paramiko.Transport((host, port))
    transport.connect(username=username, password=password)
    sftp = paramiko.SFTPClient.from_transport(transport)
    
    for item in sftp.listdir('.'):
        if item.endswith('.html'):
            print("Deleting old HTML:", item)
            sftp.remove(item)
            
    sftp.close()
    transport.close()
    print("Cleanup done!")
except Exception as e:
    print(f"Error: {e}")
