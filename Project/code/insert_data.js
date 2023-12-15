const mysql = require('mysql2');

const data = require('./city.js');

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
        console.log(`Inserted district: ${district.name}, ${city.name}, ${province.name}`);
        const insertQuery = `INSERT INTO courier_station (csaddress) VALUES ('${district.name}, ${city.name}, ${province.name}')`;
        connection.query(insertQuery, (err, results, fields) => {
          if (err) {
            console.error('Error inserting district:', err);
            return;
          }
          console.log(`Inserted district: ${district.name}, ${city.name}, ${province.name}`);
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
});




// connection.connect((err) => {
//   if (err) {
//     console.error('Error connecting to database:', err);
//     return;
//   }

//   console.log('Connected to database');

//   // console.log(data.province);
//   data.province.forEach(province => {
//     province.children.forEach(city => {
//       city.children.forEach(district => {
//         const insertQuery = `INSERT INTO courier_station (csaddress) VALUES ('${district.name}, ${city.name}, ${province.name}')`;
//         connection.query(insertQuery, (err, results, fields) => {
//           if (err) {
//             console.error('Error inserting district:', err);
//             return;
//           }
//           console.log(`Inserted district: ${district.name}, ${city.name}, ${province.name}`);
//         });
//       });
//     });
//   });
  
// });

// connection.end((err) => {
//   if (err) {
//     console.error('Error closing connection:', err);
//     return;
//   }
//   console.log('Connection closed');
// });
