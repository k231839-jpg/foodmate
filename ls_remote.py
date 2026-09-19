import paramiko

host = 'mehedihasan.au'
port = 2222
username = 'mehedih3_cpro306_g10'
password = 'cpro306'

try:
    transport = paramiko.Transport((host, port))
    transport.connect(username=username, password=password)
    sftp = paramiko.SFTPClient.from_transport(transport)
    
    print("Root:")
    for item in sftp.listdir('.'):
        print(" -", item)
        
    print("\npublic_html:")
    try:
        for item in sftp.listdir('public_html'):
            print(" -", item)
    except: pass
    
    sftp.close()
    transport.close()
except Exception as e:
    print(f"Error: {e}")
