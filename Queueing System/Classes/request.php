<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js" defer></script>
</head>
<body>
    <form action="connection.php" method="POST">
        Name: <input type="text" name="studentName" placeholder="Christian Bobo" required><br>
        Student Number: <input type="number" name="studentNum" placeholder="202300000"required><br>
        <input type="hidden" id="status" name="status" value="1">
        Request :<select id="cmbMake" name="request" required>
                  <option value="n/a">Choose Your Request</option>
                  <option value="COR">Certificate of Registration</option>
                  <option value="SF10">SF10</option>
                  <option value="COG">Certificate Of Grades</option>
                  <option value="GoodmoraL">GoodMoral</option>
                  <option value="TRacord">Transcript Record</option>
                  <option value="Diploma">Diploma</option>
                </select><br>
        Year Attended: *Reminder: Current or Last Attended*
        <input type="tel" name="year_attended" placeholder="0000-9999" pattern="[0-9]{4}-[0-9]{4}" required><br>
        Course:<input type="text" name="course"  required placeholder="BSCS" pattern="[A-Z]{4}"><br>
        Section:<input type="tel" name="section" placeholder="1-9" pattern="[0-9]{1}-[0-9]{1}" required>
        <br>
        <br>
        <input type="submit" name="save">
    </form>

</body>
</html>