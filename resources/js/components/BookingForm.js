import { useState } from "react";
import ReactDOM from 'react-dom';

const BookingForm = () => {

    const [state, setState] = useState(false);

    return (
        <h1>Hola</h1>
    );

}

export default BookingForm;

if (document.getElementById('BookingForm')) {
    ReactDOM.render(<BookingForm />, document.getElementById('BookingForm'));
}
