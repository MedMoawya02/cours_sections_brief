let btnAddSection = document.getElementById('btnAddSection');
let sectionsDiv = document.getElementById('sections');
let formAddSection = document.getElementById('formAddSection');
btnAddSection.addEventListener('click', () => {
  /*   sectionsDiv.innerHTML+=`
           <div class="mb-3">
                <div class="mb-3">
                <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="Title..." name="course_id">
            </div>

            <div class="mb-3">
                <label class="form-label">Title of section:</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title..." name="SectionTitle">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Content</span>
                <textarea class="form-control" aria-label="With textarea" name="content"></textarea>
            </div>

            <div class="input-group">
                <span class="input-group-text">Position</span>
                <input type="number" class="form-control"  name="position">
            </div>
            <button class="btn btn-secondary mt-3" id="btnAdd"><i class="fa-solid fa-plus"></i>Save</button>
        </div>
    ` */
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