<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/a7a17df157.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMI Calculator</title>
    <link rel="stylesheet" href="..\assets\css\EMI_Style.css" type="text/css">
</head>

<body style="background-color: whitesmoke;">
<?php include '_header1.php'; ?>
    <!-- Here's the formula to calculate EMI:

        EMI = P * R * (pow(1+Rate,N) / (pow(1+Rate,N)- 1));

        where,
        P is Principal Loan Amount,

        R is rate of interest calculated on monthly basis,
        (i.e., r = Rate of Annual interest/12/100. If rate of interest is 10.5% per annum, then r = 10.5/12/100=0.00875)

        N is loan term / tenure / duration in number of months.
    -->
    <!-- EMI Calculator code start here -->

    <div class="loan-calculator">
        <div class="top">
            <h2>Loan Calculator</h2>

            <form action="#">
                <div class="group">
                    <div class="title">Amount</div>
                    <input type="text" value="30000" class="loan-amount" />
                </div>

                <div class="group">
                    <div class="title">Interest Rate</div>
                    <input type="text" value="8.2" class="interest-rate" />
                </div>

                <div class="group">
                    <div class="title">Tenure (in months)</div>
                    <input type="text" value="24" class="loan-tenure" />
                </div>
            </form>
        </div>

        <div class="result">
            <div class="left">
                <div class="loan-emi">
                    <h3>Loan EMI</h3>
                    <div class="value">123</div>
                </div>

                <div class="total-interest">
                    <h3>Total Interest Payable</h3>
                    <div class="value">1234</div>
                </div>

                <div class="total-amount">
                    <h3>Total Amount</h3>
                    <div class="value">12345</div>
                </div>

                <button class="calculate-btn">Calculate</button>
            </div>
        </div>
    </div>

    <!-- EMI Calculator code end here -->
<?php include '_footer.php'; ?>


    <script src="..\assets\JS\mainemi.js"></script>
</body>

</html>