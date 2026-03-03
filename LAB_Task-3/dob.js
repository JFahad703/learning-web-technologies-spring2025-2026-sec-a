const form = document.createElement("form");
 
form.innerHTML = `
<fieldset>
<legend><h3>Date of Birth</h3></legend>
<table>
<tr>
<td style="text-align:center;">dd</td>
<td></td>
<td style="text-align:center;">mm</td>
<td></td>
<td style="text-align:center;">yyyy</td>
</tr>
<tr>
<td><input type="number" size="2" maxlength="2" min="0" max="31" required></td>
<td>/</td>
<td><input type="number" size="2" maxlength="2" min="1" max="12" required></td>
<td>/</td>
<td><input type="number" size="4" maxlength="4" min="1900" max="2016" required></td>
</tr>
<tr>
<td colspan="5"><hr></td>
</tr>
<tr>
<td colspan="3">
<input type="submit" value="Submit">
</td>
</tr>
</table>
</fieldset>
`;
 
document.body.appendChild(form);