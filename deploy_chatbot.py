import paramiko

host = 'mehedihasan.au'
port = 2222
username = 'mehedih3_cpro306_g10'
password = 'cpro306'

local_path = r'c:\Users\Acer\Desktop\Foodmate\api\chatbot.php'
remote_path = 'public_html/kent/cpro306/g10/api/chatbot.php'
remote_path_fallback = 'public_html/api/chatbot.php'

print("Connecting to server...")
try:
    transport = paramiko.Transport((host, port))
    transport.connect(username=username, password=password)
    sftp = paramiko.SFTPClient.from_transport(transport)
    
    print(f"Uploading chatbot.php to {remote_path}...")
    sftp.put(local_path, remote_path)
    
    print(f"Uploading chatbot.php to {remote_path_fallback}...")
    sftp.put(local_path, remote_path_fallback)
    
    sftp.close()
    transport.close()
    print("Upload complete!")
except Exception as e:
    print(f"Upload failed: {e}")
