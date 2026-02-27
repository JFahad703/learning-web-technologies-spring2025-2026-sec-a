        const form = document.createElement('form');
        form.innerHTML = `
            <legend><b>Name</b></legend>
            <input type="text" id="name" name="name" /><br><br>
            <input type="submit" value="Submit" />
        `;
        
      
        document.body.appendChild(form);