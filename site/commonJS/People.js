function People(name)
{
	this.name=name;
	this.run=run;
	
	var myFunc;
	
	function run(func)
	{
		myFunc=func;
		this.age=20+this.name.length;
		alert(this.name+"People run....");
		myFunc();
	}
}