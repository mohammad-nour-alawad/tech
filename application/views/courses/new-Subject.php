<div class="real-body">
    <div class="new-subject-No-Bootstrap">
        <h2>SUGGEST NEW COURSE</h2>
        <div class="subject-container">
            <form action="<?php echo URL; ?>courses/checkNewCourse" method="POST">
                <div class="course-title">
                    <label for="" id="new-subject-label">Tilte *</label>
                    <input type="text" name="title" id="new-subject-title">
                </div>
                <div>
                    <label for="">Category</label>
                    <select name="category" id="">
                        <option value="not specified">Choose a Category</option>
                        <option value="Algebra">Algebra</option>
                        <option value="Analysis">Analysis</option>
                        <option value="Chimistry">Chimistry</option>
                        <option value="Java Programming">Java Programming</option>
                        <option value="C++">C++</option>
                        <option value="Web">Web</option>
                        <option value="Probabilities">Probabilities</option>
                    </select>
                </div>
                <div>
                    <label for="">Classification</label>
                    <select name="classification" id="">
                        <option value="general">Choose a Classification</option>
                        <option value="Basics">Basics</option>
                        <option value="Starters">Starters</option>
                        <option value="Intermediates">Intermediates</option>
                        <option value="Expert">Expert</option>
                        <option value="Advanced">Advanced</option>
                    </select>
                </div>
                <div class="course-description">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <label for="">Course Brochour</label>
                    <input type="file" name="course_img_url" id="file-reader">
                    <img src="" alt="" id="Brochour">
                </div>
                <button type="submit" name="submit_course">Submit</button>
            </form>
        </div>
    </div>
</div>