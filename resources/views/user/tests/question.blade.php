<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Test page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
        }

        .container {
            max-width: 2000px;
            margin: 0 auto;
            padding: 80px;
            background: linear-gradient(45deg, rgba(242, 219, 190, 0.7), rgba(250,197, 145, 0.7));
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.9);
            border-radius: 8px;
        }

        .header {
            text-align: center;
            margin-bottom: 70px;
        }

        .question {
            margin-bottom: 20px;
        }

        .question-text {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .answer-label {
            font-size: 1em;
            padding-left: 30px;
            position: relative;
        }

        .answer-label::before {
            content: "";
            width: 20px;
            height: 20px;
            border: 2px solid #808080;
            border-radius: 50%;
            display: block;
            position: absolute;
            top: 5px;
            left: 0;
        }

        input[type="radio"]:checked + .answer-label::before {
            background-color: #FF5683;
            border-color: #FF5683;
        }

        .submit-btn {
            display: block;
            margin-top: 20px;
            margin-left: auto;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="header">
            <h1> Quiz</h1>
            <p>Find out how well you know on your courses</p>
        </div>
        <form id="question-form" action="{{ route('dashboard.checkanswer') }}" method="post">
            <fieldset>
                @foreach($questions as $item)
                <div class="question">
                    <div class="question-text">{{ $item->question }}</div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="{{ $item->id }}-option1" name="{{ $item->id }}" value="{{ $item->answer->answer_text1 }}" class="custom-control-input">
                            <label class="custom-control-label answer-label" for="{{ $item->id }}-option1">{{ $item->answer->answer_text1 }}</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="{{ $item->id }}-option2" name="{{ $item->id }}" value="{{ $item->answer->answer_text2 }}" class="custom-control-input">
                            <label class="custom-control-label answer-label" for="{{ $item->id }}-option2">{{ $item->answer->answer_text2 }}</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <button type="reset" class="btn btn-danger btn-block submit-btn">Reset..</button>
                <button type="submit" class="btn btn-primary btn-block submit-btn">Submit</button>
            </fieldset>
        </form>
    </div>
<div id="result-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Result</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="result-score"></p>
      </div>
      <div class="modal-footer">
        <button type="button" id="close-modal-btn" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $('#question-form').submit(function(e) {
        e.preventDefault();
        var formData = {
            answers: {}
        };
        
        $('input[type="radio"]:checked').each(function() {
            var questionId = $(this).attr('name');
            var answer = $(this).val();
            formData.answers[questionId] = answer;
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                
            });
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
               $('#result-score').text('Your score: ' + response.score);
               $('#result-modal').modal('show');
                    $('#question-form')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    $('#close-modal-btn').click(function() {
    $('#result-modal').modal('hide');
  });
});

</script>
</html>