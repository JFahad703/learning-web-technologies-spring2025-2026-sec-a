       const form = document.createElement('form');
        form.innerHTML = `
     <fieldset>
            <legend>Profile Picture</legend>
            User Id <input type="text" name="" value=""/> <br><br>
            Picture <input type="file">
            <br>
            <hr>
            <input type="submit" name="" value="Submit"/>
        </fieldset>
    
        `;
        
      
        document.body.appendChild(form);