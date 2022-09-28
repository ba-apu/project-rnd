function english_to_bangla(value) {
	let input = String(value).split('');
	let mapData = {
		"0": "০",
		"1": "১",
		"2": "২",
		"3": "৩",
		"4": "৪",
		"5": "৫",
		"6": "৬",
		"7": "৭",
		"8": "৮",
		"9": "৯",
		".": ".",
		",": ","
	};
	let output = '';
	var tempArray = []
	for (let i = 0; i < input.length; i++) {
		tempArray.push(mapData[input[i]])
	}
	output = tempArray.join('');
	return output;
}
function bangla_to_english(value) {
	let input = String(value).split('');
	let mapData = {
		"০": "0",
		"১": "1",
		"২": "2",
		"৩": "3",
		"৪": "4",
		"৫": "5",
		"৬": "6",
		"৭": "7",
		"৮": "8",
		"৯": "9",
		".": "."
	};
	let output = '';
	var tempArray = []
	for (let i = 0; i < input.length; i++) {
		tempArray.push(mapData[input[i]])
	}
	output = tempArray.join('');
	return output;
}

function moneyFormat(price) {
	const pieces = parseFloat(price).toFixed(2).split('')
	let ii = pieces.length - 3
	while ((ii -= 3) > 0) {
		pieces.splice(ii, 0, ',')
	}
	return pieces.join('')
}