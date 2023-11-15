import React from 'react';
import ReactDOM from 'react-dom';
import { DatePicker, Form, Button, Input, Radio, Select } from 'antd';
import Axios from 'axios';
import { appDefaultValues } from '../AppConstants';

const { RangePicker } = DatePicker;

const { TextArea } = Input;

const widthInput = '600px';

let bookingStore = appDefaultValues.StringDefault;

if (document.getElementById('BookingForm')) {
    bookingStore = document.getElementById('BookingForm').getAttribute('data-booking-store');
}

const BookingForm = () => {

    const [form] = Form.useForm();

    const onFinish = (values) => {
        Axios.post(bookingStore,values).then((response) => {
            console.log(response);
        });
    };

    return (
        <div className='bookingForm'>
            <div className='title-booking-form'>Realizar Reserva</div>
            <Form
                layout={"vertical"}
                onFinish={onFinish}
                form={form}
            >
                <Form.Item
                    label="Cliente"
                    name="customer"
                    rules={[
                        {
                            required: true,
                            message: 'El cliente es requerido.'
                        },
                    ]}
                >
                    <Input
                        style={{
                            width: widthInput
                        }}
                    />
                </Form.Item>

                <Form.Item
                    label='Checkin - Checkout'
                    name='check'
                    rules={[
                        {
                            required: true,
                            message: "El checkin y checkout es obligatorio."
                        }
                    ]}
                >
                    <RangePicker
                        showTime={{
                            format: 'HH:mm',
                        }}
                        format="YYYY-MM-DD HH:mm:ss"
                        style={{
                            width: widthInput
                        }}
                    />
                </Form.Item>

                <Form.Item
                    label="DNI"
                    name="dni"
                    rules={[
                        {
                            required: true,
                            message: 'El DNI es requerido.'
                        }
                    ]}
                >
                    <Input
                        style={{
                            width: widthInput
                        }}
                        maxLength={8}
                    />
                </Form.Item>

                <Form.Item
                    label="Genero"
                    name="gender"
                    rules={[
                        {
                            required: true,
                            message: 'El genero es requerido.'
                        }
                    ]}
                >
                    <Radio.Group>
                        <Radio value={'MASCULINO'}>MASCULINO</Radio>
                        <Radio value={'FEMENINO'}>FEMENINO</Radio>
                    </Radio.Group>
                </Form.Item>

                <Form.Item
                    label="N° Habitación"
                    name="room"
                    rules={[
                        {
                            required: true,
                            message: 'El número de habitación es requerido.'
                        },
                    ]}
                >
                    <Input
                        style={{
                            width: widthInput
                        }}
                    />
                </Form.Item>

                <Form.Item
                    label="Precio"
                    name="price"
                    rules={[
                        {
                            required: true,
                            message: 'El precio es obligatorio.'
                        },
                    ]}
                >
                    <Input
                        style={{
                            width: widthInput
                        }}
                    />
                </Form.Item>

                <Form.Item
                    label="Tipo de pago"
                    name="payment_type"
                    rules={[
                        {
                            required: true,
                            message: 'El tipo de pago es obligatorio.'
                        },
                    ]}
                >
                    <Select
                        options={[
                            { value: 'YAPE', label: 'Yape' },
                            { value: 'PLIN', label: 'Plin' },
                            { value: 'TRANSFERENCIA', label: 'Transferencia' },
                        ]}
                        width={widthInput}
                    />
                </Form.Item>

                <Form.Item
                    label="Observaciones"
                    name="observations"
                    rules={[
                        {
                            required: true,
                            message: 'Las observaciones son requerido.'
                        },
                    ]}
                >
                    <TextArea rows={4} />
                </Form.Item>

                <Form.Item>
                    <Button type="primary" htmlType="submit">Registrar</Button>
                </Form.Item>

            </Form>
        </div>
    );

}

export default BookingForm;

if (document.getElementById('BookingForm')) {
    ReactDOM.render(<BookingForm />, document.getElementById('BookingForm'));
}
