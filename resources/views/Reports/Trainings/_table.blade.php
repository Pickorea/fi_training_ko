<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<table id="customers">
    <thead>
    <tr>
        <th>Name</th>
        <th>Village Name</th>
        <th>Training Date</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Training Name</th>
        <th>Age</th>
        <th>Gender</th>
    </tr>
    </thead>
    <tbody>
    @foreach($trainings as $training)
        <tr>
            <td>{{ $training->island_name }}</td>
            <td>{{ $training->village_name }}</td>
            <td>{{date('d-m-Y', strtotime($training->training_date))}}</td>
            <td>{{ $training->participant_first_name }}</td>
            <td>{{ $training->participant_last_name }}</td>
            <td>{{ $training->training_name }}</td>
            <td>{{ $training->age }}</td>
            <td>{{ $training->gender ?'M':'F'}}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>