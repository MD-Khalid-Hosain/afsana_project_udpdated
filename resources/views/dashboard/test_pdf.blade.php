<table>
  <tr>
    <th>khalid</th>
  </tr>
  @foreach ($data as $all_data)
    <td>{{ $all_data->user_email }}</td>
  @endforeach
  <tr>
    <td></td>
  </tr>
</table>
