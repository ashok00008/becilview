                                <table>
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Advertisement</th>
                                        <th>Designation</th>
                                        <th>No Vacancy</th>
                                        <th>Opening Date</th>
                                        <th>Closing Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $jobs)
                                        <tr>
                                        <td>1</td>
                                        <td >{{ $jobs->description }}</td>
                                        
                                        <td >{{ $jobs->description }}</td>
                                         
                                        <td>{{ $jobs->description }}</td>
                                        <td>{{ $jobs->description }}</td>
                                        <td>{{ $jobs->description }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                            </table>