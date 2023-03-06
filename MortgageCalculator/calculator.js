function calculate(){
    let principalAmount = parseFloat(document.getElementById("pa").value);
    console.log(principalAmount)
    let yearRate = parseFloat(document.getElementById("ir").value);
    console.log(yearRate)
    let loanTerm = parseInt(document.getElementById("term").value);
    console.log(loanTerm)

    let invalidPA = checkValid(principalAmount);
    let invalidIR = checkValid(yearRate);
    let invalidLT = checkValid(loanTerm);

    if (invalidPA || invalidIR || invalidLT){
        alert("Negative or Non-Numeric Values are Not Allowed")
    }

    else{
        let monthRate = yearRate/12;
        console.log(monthRate)
        let monthlyPayment = (principalAmount * monthRate) / (1 - (1 / ((1 + monthRate)**loanTerm)))
        monthlyPayment = monthlyPayment.toFixed(2);
        document.getElementById("mortgage").innerHTML = monthlyPayment;
        let sumPayment = monthlyPayment * loanTerm;
        sumPayment = sumPayment.toFixed(2);
        document.getElementById("sum").innerHTML = sumPayment;
        let totalInterest = sumPayment - principalAmount;
        totalInterest = totalInterest.toFixed(2);
        document.getElementById("total").innerHTML = totalInterest;
    }


}

function checkValid(val){
    if (val < 0 || isNaN(val)) {
        return true;
    }
}