import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import { Button, Form, Input, Card, Spin } from 'antd';
import Axios from 'axios';
import { appDefaultValues } from '../AppConstants';

let appName = appDefaultValues.StringDefault;
let loginRoute = appDefaultValues.StringDefault;
let homeRoute = appDefaultValues.StringDefault;

if (document.getElementById('LoginForm')) {
    appName = document.getElementById('LoginForm').getAttribute('data-app-name');
    loginRoute = document.getElementById('LoginForm').getAttribute('data-login');
    homeRoute = document.getElementById('LoginForm').getAttribute('data-home');
}

const LoginForm = () => {

    const [loading, setLoading] = useState(false);

    const onFinish = (values) => {
        setLoading(true);
        Axios.post(loginRoute, values).then(() => {
            window.location.href = homeRoute;
        });
    };

    return (
        <div className='login-container'>
            <Spin spinning={loading} delay={500}>
                <Card
                    title={appName}
                    bordered={false}
                    style={{
                        width: 500,
                    }}
                >
                    <Form
                        name="basic"
                        labelCol={{
                            span: 8,
                        }}
                        wrapperCol={{
                            span: 16,
                        }}
                        style={{
                            maxWidth: 600,
                        }}
                        initialValues={{
                            remember: true,
                        }}
                        onFinish={onFinish}
                        autoComplete="off"
                    >
                        <Form.Item
                            label="Email"
                            name="email"
                            rules={[
                                {
                                    required: true,
                                    message: 'Por favor, ingresa un correo.',
                                },
                            ]}
                        >
                            <Input />
                        </Form.Item>

                        <Form.Item
                            label="Contraseña"
                            name="password"
                            rules={[
                                {
                                    required: true,
                                    message: 'Por favor, ingresa una contraseña.',
                                },
                            ]}
                        >
                            <Input.Password />
                        </Form.Item>

                        <Form.Item
                            wrapperCol={{
                                offset: 8,
                                span: 16,
                            }}
                        >
                            <Button type="primary" htmlType="submit">
                                Ingresar
                            </Button>
                        </Form.Item>
                    </Form>
                </Card>
            </Spin>
        </div>
    );

}

export default LoginForm;

if (document.getElementById('LoginForm')) {
    ReactDOM.render(<LoginForm />, document.getElementById('LoginForm'));
}