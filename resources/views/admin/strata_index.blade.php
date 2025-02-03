<table>
    <thead>
        <tr>
            <th>Strata</th>
            <th>Pendidikan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($strata as $strata)
            <tr>
                <td>{{ $strata->nama_strata }}</td>
                <td>
                    <ul>
                        @foreach ($strata->pendidikan as $pendidikan)
                            <li>{{ $pendidikan->nama_pendidikan }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>