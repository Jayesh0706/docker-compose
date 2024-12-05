const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 3000;

// MySQL connection setup
const db = mysql.createConnection({
  host: 'db', // Use the name of the db service from Docker Compose
  user: 'root',
  password: process.env.MYSQL_ROOT_PASSWORD,
  database: process.env.MYSQL_DATABASE
});

db.connect((err) => {
  if (err) {
    console.error('Error connecting to the database:', err);
    return;
  }
  console.log('Connected to the database!');
});

app.get('/', (req, res) => {
  res.send('Hello, world!');
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}/`);
});
