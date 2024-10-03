const testRoot = document.getElementById('testRchrRoot')

if (testRoot === undefined || testRoot === null) {
    console.error('testRoot is ', testRoot)
}
console.log('Inserting ok....')
testRoot.innerHTML = '<h1>Test Success!</h1>';