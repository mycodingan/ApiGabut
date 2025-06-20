import './bootstrap';
Echo.channel('loan-status')
    .listen('.LoanApproved', (e) => {
        console.log('📢 Loan Approved Broadcast Received!');
        console.log(e.loan);
        alert(`🎉 Loan for ${e.loan.user} approved! 💰`);
    });
