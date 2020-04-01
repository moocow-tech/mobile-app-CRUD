class Employee {
    constructor(){
        this.employee= {};
    }

    addEmployee(name, pay, hours, code ){
        this.employee = {
            empName : name,
            empPay : pay,
            empHours : hours,
            empCode : code
        };
    }
};