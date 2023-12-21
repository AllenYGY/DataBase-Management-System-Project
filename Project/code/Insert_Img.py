import pymysql

# 数据库连接参数
servername = "localhost"
username = "root"
password = ""
db = "project"

# 建立数据库连接
connection = pymysql.connect(host=servername, user=username, passwd=password, db=db)

file_path = '/Applications/XAMPP/xamppfiles/htdocs/php/Project/Code/Image/user-2.png'  # 图片文件的路径
with open(file_path, 'rb') as file:
    binary_data = file.read()  # 读取文件内容为二进制数据

try:
    with connection.cursor() as cursor:
        # 更新所有 upicture 为 NULL 的行
        sql = "UPDATE admin SET upicture = %s WHERE upicture IS NULL"
        cursor.execute(sql, (binary_data,))
    connection.commit()
finally:
    connection.close()
