let btnAddSection = document.getElementById('btnAddSection');
let sectionsDiv = document.getElementById('sections');
let formAddSection = document.getElementById('formAddSection');
btnAddSection.addEventListener('click', () => {

    let div=document.createElement('div');
    div.innerHTML=`
            <div class="mb-3">
                <label class="form-label">Title of section:</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title..." name="SectionTitle[]">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Content</span>
                <textarea class="form-control" aria-label="With textarea" name="content[]"></textarea>
            </div>

            <div class="input-group">
                <span class="input-group-text">Position</span>
                <input type="number" class="form-control"  name="position[]">
            </div>
        </div>
    `
    sectionsDiv.appendChild(div);
})