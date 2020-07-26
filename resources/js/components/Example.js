import React from 'react';
import ReactDOM from 'react-dom';
import Button from '@material-ui/core/Button';



function Example() {
    return (
        <div>
            <Button variant="contained" color="primary">
                Hola Mundo!
            </Button>
        </div>
    );
} 

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
