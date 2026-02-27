 const form = document.createElement('form');
        form.innerHTML = `
           <legend>Email</legend>
            <input type="email" id="email" name="email" 
                   placeholder="" required>

            <img src="info.png" 
                 title="Hint: sample@example.com" 
                 width="18" height="18" 
                 alt="Email hint icon">

            <br><br>

            <input type="submit" value="Submit">
        `;
        
      
        document.body.appendChild(form);