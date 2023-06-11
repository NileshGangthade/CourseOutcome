<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/view_result.css') ?>">
</head>

<body>
    <?php include 'nav_bar.php'; ?>
    <div class="container">
        <h1>Create a New Paper</h1>
        <form action="<?= base_url('dashboard/processForm') ?>" method="post">
            <div class="form_wrapper">
                <div class="form_container">
                    <div class="title_container">
                        <h1>Show Available Papers Direct Attainment</h1>
                    </div>
                    <div class="row clearfix">
                        <div class="">

                            <div class="input_field_dept">
                                <label for="department">Department : </label>
                                <span><i aria-hidden="true" class="fa fa-university"></i></span>
                                <span id="department-text"><?php echo getDepartmentName($department); ?></span>
                                <input type="hidden" id="department" name="department" value="<?php echo $department; ?>">
                            </div>

                            <input type="hidden" name="department_hidden" value="<?php echo $department; ?>">

                            <div class="input_field select_option">
                                <span><i aria-hidden="true" class="fa fa-calendar"></i></span>
                                <select id="year" name="year" required>
                                    <option value="">Select Year</option>
                                    <option value="SY_Btech">Second Year</option>
                                    <option value="TY_Btech">Third Year</option>
                                    <option value="BE">Fourth Year</option>
                                </select>
                                <div class="select_arrow"></div>
                            </div>



                            <div class="input_field select_option">
                                <span><i aria-hidden="true" class="fa fa-sort-alpha-down"></i></span>
                                <select id="division" name="division" required>
                                    <option value="">Select Division</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                                <div class="select_arrow"></div>
                            </div>

                            <div class="input_field select_option">
                                <span><i aria-hidden="true" class="fa fa-calendar"></i></span>
                                <select id="sem" name="sem" required>
                                    <option value="SEM_I">First Semester</option>
                                    <option value="SEM_II">Second Semester</option>
                                </select>
                                <div class="select_arrow"></div>
                            </div>

                            <div class="input_field">
                                <span><i aria-hidden="true" class="fa fa-book"></i></span>
                                <input type="text" id="subject" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="input_field">
                                <span><i aria-hidden="true" class="fa fa-calendar"></i></span>
                                <input type="text" id="academic-year" name="academic-year" pattern="\d{4}_\d{2}" placeholder="Academic Year (e.g., 2023_24)" required>
                            </div>
                            <div class="input_field select_option">
                                <span><i aria-hidden="true" class="fa fa-calendar"></i></span>
                                <select id="test-type" name="test-type" placeholder="Test type" required>
                                    <option value="">Test type</option>
                                    <option value="UT1">UT1</option>
                                    <option value="UT2">UT2</option>
                                    <option value="UT3">UT3</option>
                                    <option value="Prelim">Prelims</option>
                                    <option value="Assign1">Assignment_1</option>
                                    <option value="Assign2">Assignment_2</option>
                                    <option value="Assign3">Assignment_3</option>
                                    <option value="Assign4">Assignment_4</option>
                                </select>
                                <div class="select_arrow"></div>
                            </div>

                            <div class="frame">
                                <button class="custom-btn btn-9" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>




</body>

</html>