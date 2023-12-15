const mysql = require('mysql');
const data = require('city.js'); // 替换为包含你的区县数据的文件路径

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '040301Yjy',
  database: 'project'
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to database:', err);
    return;
  }
  console.log('Connected to database');

  data.province.forEach(province => {
    province.children.forEach(city => {
      city.children.forEach(district => {
        const insertQuery = `INSERT INTO courier_station (csaddress) VALUES ('${district.name}')`;
        connection.query(insertQuery, (err, results, fields) => {
          if (err) {
            console.error('Error inserting district:', err);
            return;
          }
          console.log(`Inserted district: ${district.name}`);
        });
      });
    });
  });
});

connection.end((err) => {
  if (err) {
    console.error('Error closing connection:', err);
    return;
  }
  console.log('Connection closed');
});
