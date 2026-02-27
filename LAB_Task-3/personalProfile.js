const form = document.createElement("form");

form.innerHTML = `
<table cellspacing="0" border="1" width="80%">
    <tr>
        <th colspan="3"><h2>PERSONAL PROFILE</h2></th>
    </tr>

    <tr>
        <td>&nbsp;Name</td>
        <td>&nbsp;<input type="text" id="name"></td>
        <td></td>
    </tr>

    <tr>
        <td>&nbsp;Email</td>
        <td>&nbsp;<input type="text" id="email"></td>
        <td></td>
    </tr>

    <tr>
        <td>&nbsp;Gender</td>
        <td>
            &nbsp;
            <label><input type="radio" name="gender" value="Male"> Male</label>
            <label><input type="radio" name="gender" value="Female"> Female</label>
            <label><input type="radio" name="gender" value="Others"> Others</label>
        </td>
        <td></td>
    </tr>

   <tr>
    <td style="padding-left:8px;">Date of Birth</td>
    <td>
        <input type="text" size="2" maxlength="2" >
        /
        <input type="text" size="2" maxlength="2" >
        /
        <input type="text" size="4" maxlength="4" >
        <span style="margin-left:8px; font-style:italic;">(dd/mm/yyyy)</span>
    </td>
    <td></td>
</tr>

    <tr>
        <td>&nbsp;Blood Group</td>
        <td>
            &nbsp;
            <select id="blood">
                <option>A+</option><option>A-</option>
                <option>B+</option><option>B-</option>
                <option>AB+</option><option>AB-</option>
                <option>O+</option><option>O-</option>
            </select>
        </td>
        <td></td>
    </tr>

    <tr>
        <td>&nbsp;Degree</td>
        <td>
            &nbsp;
            <label><input type="checkbox" value="SSC"> SSC</label>
            <label><input type="checkbox" value="HSC"> HSC</label>
            <label><input type="checkbox" value="BSc"> BSc.</label>
            <label><input type="checkbox" value="MSc"> MSc.</label>
        </td>
        <td></td>
    </tr>

    <tr>
        <td>&nbsp;Photo</td>
        <td colspan="2">&nbsp;<input type="file" id="photo"></td>
    </tr>

    <tr>
        <td colspan="3" align="right">
            <br>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">&nbsp;
        </td>
    </tr>
</table>
`;


document.body.appendChild(form);