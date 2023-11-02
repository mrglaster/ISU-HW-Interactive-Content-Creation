<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-family: calibri;
        font-size: 16px;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>
<html>
   <header>
      <title>Laravel:Beginning Task</title>
   </header>
   <body>
      <table>
         <thead>
            <tr>
               <th>Title</th>
               <th>Description</th>
            </tr>
         </thead>
         <tbody>
            @foreach(glob(storage_path('app/public/form-uploaded/*.json')) as $jsonFile)
            @php
                $jsonData = json_decode(file_get_contents($jsonFile), true);
            @endphp
            @if ($jsonData !== null && isset($jsonData['title']) && isset($jsonData['description']))
            <tr>
               <td>{{ $jsonData['title'] }}</td>
               <td>{{ $jsonData['description'] }}</td>
            </tr>
            @endif
            @endforeach
         </tbody>
      </table>
   </body>
</html>
