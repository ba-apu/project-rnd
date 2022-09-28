<table class="table table-hover demo-table-dynamic table-responsive-block">
    <thead>
        <th>ইন্ডিকেটর এর নাম</th>
        <th>ইন্ডিকেটর এর নাম বাংলায়</th>
        <th>প্রকল্পের নাম</th>
        <th>ইউনিট</th>
        <th>শর্ট ফর্ম</th>
        <th>রুলস</th>
        <th>স্ট্যাটাস</th>
    </thead>
    <tbody>
    @for($i=0;$i<200;$i++)
        <tr>

            <td>{{$i}} ABCD</td>
            <td>{{$i}} ABCD</td>
            <td>{{$i}} ABCD</td>
            <td>{{$i}} ABCD</td>
            <td>{{$i}} ABCD</td>
            <td>{{$i}} ABCD</td>
            <td>{{$i}} ABCD</td>
        </tr>
    @endfor
    </tbody>


</table>