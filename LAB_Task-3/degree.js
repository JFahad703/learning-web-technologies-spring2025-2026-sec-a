        const form = document.createElement('form');
        form.innerHTML = `
             <fieldset width="80%">
            <legend>Degree</legend>
            <input type="checkbox" name="" value=""/>SSC
            <input type="checkbox" name="" value=""/>HSC
            <input type="checkbox" name="" value=""/>BSc
            
        </fieldset>
        <br>
        <input type="submit" name="" value="Submit"/>
        `;
        
      
        document.body.appendChild(form);