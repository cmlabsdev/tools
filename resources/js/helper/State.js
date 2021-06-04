let State = function(){
    let states = []
    let currentState = -1

    return {
        save : function(data){
            if (data.trim().localeCompare(states[currentState]) !== 0 ){
                if (states.length > 0){
                    states.splice(currentState + 1,states.length  - (currentState + 1))
                }
                states.push(data)
                currentState++
            }
        },

        undo : function(){
            if (states[currentState - 1] || states[currentState - 1] === ''){
                currentState--
            }
            return states[currentState]
        },

        redo : function(){
            if (states[currentState+1]){
                currentState++
            }
            return states[currentState]
        },

        reset : function(){
            states = []
            currentState = -1
        }
    }
}();
