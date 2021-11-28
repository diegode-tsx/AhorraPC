document.querySelectorAll(".controls button").forEach(button=>{
	button.addEventListener("click",(ev)=>{
		const parent = button.parentNode;
		const grantParent = parent.parentNode;
		const container = grantParent.querySelector(".tabs-container");
		const childrenList = Array.from(parent.children);
		const index = childrenList.indexOf(button);
		container.style.transform = `translatex(-${index * 100}%`;

		parent.querySelectorAll("button.active")
		.forEach(activeBtn => activeBtn.classList.remove("active"));

		button.classList.add("active");
	})
})