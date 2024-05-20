<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create row</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .container{
            margin: 10%;
        }
    </style>
</head>
<body>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="container">
            <div id="companyWrapper">
                <div class="companyGroup">
                    <div class="companyDetails">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" name="c_name[]" placeholder="Enter Company name">
                            </div>
                            {{--  <div class="form-group col-md-2">
                                <label>&nbsp;</label>
                                <a href="javascript:void(0);" class="btn btn-danger removeCompany">Remove Company</a>
                            </div>  --}}
                        </div>
                    </div>
                    <div class="projectWrapper">
                        <div class="projectGroup">
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="p_name">Project Name</label>
                                    <input type="text" class="form-control" name="p_name[0][]"  placeholder="Enter Project name">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="type">Type</label>
                                    <input type="text" class="form-control" name="type[0][]" placeholder="type">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>&nbsp;</label><br>
                                    <a href="javascript:void(0);" class="btn btn-success addProject">Add Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <a href="javascript:void(0);" class="btn btn-success addCompany">Add Company</a>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <div class="companyTemplate" style="display: none;">
        <div class="companyGroup">
            <div class="companyDetails">
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="company_name">Company Name</label>
                        <input type="text" class="form-control" name="c_name[]"  placeholder="Enter Company namee">
                    </div>
                    <div class="form-group col-md-2">
                        <label>&nbsp;</label>
                        <a href="javascript:void(0);" class="btn btn-danger removeCompany">Remove Company</a>
                    </div>
                </div>
            </div>
            <div class="projectWrapper">
                <div class="projectGroup">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="p-name">Project Name</label>
                            <input type="text" class="form-control" name="p_name[][]"  placeholder="Enter Project name">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type[][]" placeholder="type">
                        </div>
                        <div class="form-group col-md-2">
                            <label>&nbsp;</label><br>
                            <a href="javascript:void(0);" class="btn btn-success addProject">Add Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="projectTemplate" style="display: none;">
        <div class="projectGroup">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="p-name">Project Name</label>
                    <input type="text" class="form-control" name="p_name[INDEX][]" placeholder="Enter Project name">
                </div>
                <div class="form-group col-md-5">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type[INDEX][]" placeholder="type">
                </div>
                <div class="form-group col-md-2">
                    <label>&nbsp;</label><br>
                    <a href="javascript:void(0);" class="btn btn-danger removeProject">Remove Project</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var companyIndex = 0;

            // Function to add a new company group
            function addCompany() {
                var companyHTML = $('.companyTemplate').html().replace(/INDEX/g, companyIndex);
                $('#companyWrapper').append(companyHTML);
                companyIndex++;
            }

            // Function to add a new project group within a company group
            function addProject(companyIndex) {
                var projectHTML = $('.projectTemplate').html().replace(/INDEX/g, companyIndex);
                $('body').find('.companyGroup').eq(companyIndex).find('.projectWrapper').append(projectHTML);
            }

            // add company
            $('body').on('click', '.addCompany', function () {
                addCompany();
            });

            $('body').on('click', '.addProject', function () {
                var companyIndex = $(this).closest('.companyGroup').index();
                addProject(companyIndex);
            });

            $('body').on('click', '.removeCompany', function () {
                $(this).closest('.companyGroup').remove();
            });

            $('body').on('click', '.removeProject', function () {
                $(this).closest('.projectGroup').remove();
            });
        });
    </script>
</body>
</html>
