<!-- Attendance Checker -->

<strong>Attending</strong>
<table>
    <tbody>
        <tr>
        	<!-- Set Match Fixture Id Dynamically -->
            <td><input type="radio" id="attendance_yes" name="attendance" value="Yes" onclick="rsvp_attendance('3596', this);"></td>
            <td>Yes</td>
            <td><input type="radio" id="attendance_no" name="attendance" value="No" onclick="rsvp_attendance('3596', this);"></td>
            <td>No</td>
            <td><div id="msg" ></div></td>
        </tr>
    </tbody>
</table>

